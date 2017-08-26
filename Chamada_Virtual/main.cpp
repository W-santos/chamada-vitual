#include <opencv2/core.hpp>
#include <opencv2/face.hpp>
#include <opencv2/objdetect.hpp>
#include <opencv2/imgproc.hpp>
#include <opencv2/highgui.hpp>
#include "opencv2/face.hpp"
#include <bits/stdc++.h>


using namespace cv;
using namespace std;
using namespace cv::face;

set<string> names;
void le_csv(const string&arquivo, vector<Mat>&imagens, vector<int>& labels,map<int,string>& dicionario,char separador = ';' )
{
    ifstream arq(arquivo.c_str(),ifstream::in);

    if(!arq)
    {
        string erro = "Erro! Nome de arquivo inválido";
        CV_Error(Error::StsBadArg,erro);
    }
    string linha,caminho,label,nome;
    while(getline(arq,linha))
    {
        stringstream ss(linha);
        getline(ss,caminho,separador);
        getline(ss,label,separador);
        getline(ss,nome);
        if(!caminho.empty() && !label.empty() && !nome.empty())
        {
            imagens.push_back(imread(caminho,0));
            int lb = atoi(label.c_str());
            labels.push_back(lb);
            dicionario[lb] = nome;
            names.insert(nome);

        }
    }
}

int main(int argc, char **argv )
{
    if(argc<2)
    {
        cout << "Modo de uso " << argv[0] << " imagem"<<endl;
        exit(1);
    }
    ofstream saida("Alunos.txt");
    ofstream json("Presenca.json");
    json << "{\n";
    string haar = "haarcascade_frontalface_alt.xml";
    string csv = "at.csv";
    string desc = "";
    map<string,string>presenca;
    vector<Mat>imagens;
    vector<int>labels;
    map<int,string>nomes;
    try
    {
        le_csv(csv,imagens,labels,nomes);

    }catch(cv::Exception e)
    {
        cout << "Erro abrindo o arquivo " << csv << " motivo " << e.msg << endl;
        exit(1);
    }

    int largura = imagens[0].cols;
    int altura = imagens[0].rows;

    Ptr<FisherFaceRecognizer> modelo = FisherFaceRecognizer::create();
    if(desc == "")
    {
        modelo->train(imagens,labels);
        modelo->save("faces.xml");
    }
    else
    {
        modelo->read(desc);
    }
    CascadeClassifier haar_cascade;
    haar_cascade.load(haar);

    Mat frame = imread(argv[1]);
    Mat original = frame.clone();
    Mat cinza;
    cvtColor(original,cinza,COLOR_BGR2GRAY);
    vector<Rect_<int> > rostos;
    haar_cascade.detectMultiScale(cinza,rostos);

    for(int i =0;i < rostos.size();i++)
    {
        Rect rosto_i = rostos[i];
        Mat rosto = cinza(rosto_i);
        Mat rosto_dimensionado;

        resize(rosto,rosto_dimensionado,Size(largura,altura),1.0,1.0,INTER_CUBIC);
        int previsao;
        double acuracidade = .80;
        modelo->predict(rosto_dimensionado,previsao,acuracidade);
        rectangle(original, rosto_i, Scalar(255, 0,0), 1);
        string texto = "Pessoa = " + nomes[previsao];
        presenca[nomes[previsao]] = "Presente";
        saida << nomes[previsao]<< '\n';
        int x = max(rosto_i.tl().x-10,0);
        int y = max(rosto_i.tl().y-10,0);

        putText(original,texto,Point(x,y),FONT_HERSHEY_PLAIN,1.0,Scalar(255,0,0),2);

    }
    for(set<string>::iterator name = names.begin();name!=names.end();name++) {
      json << *name<< " : ";
      if(presenca[*name] == "Presente") {
           json << presenca[*name] << '\n';
      }
      else {
          json << "Ausente\n";

      }


    }
    json << "}";
    imwrite("Chamada Virtual.jpg",original);
    char key = waitKey(0);



    return 0;
}
