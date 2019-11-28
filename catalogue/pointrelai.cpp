#include "pointrelai.h"
#include "passerelle.h"
#include <QDebug>
PointRelai::PointRelai()
{

}

PointRelai::PointRelai(QString pointRelaiNom, QString pointRelaiAdresse)
{
    this->pRNom = pointRelaiNom;
    this->pRAdresse = pointRelaiAdresse;
    qDebug()<<pRNom + ", " + pRAdresse;
}

QString PointRelai::versChainePointRelai()
{
    QString chaine;
    chaine += "You have chosen the relay points :";
    chaine += "<p>" + pRNom + "</p>";
    chaine += "<h3>" + pRAdresse + "</h3>";
    chaine+="<h1>Liste des producteurs</h1><ul>";
    for(int noProd=0;noProd<lesProducteurs.size();noProd++)
    {
        chaine+="<li>"+lesProducteurs[noProd].versChaineProducteurs()+"</li>";
    }
    chaine+="</ul>";
    //j'obtiens les rayons
    //pour chaque rayon
    //j'affiche les produits du rayon
    return chaine;
}

void PointRelai::setProducteurs(QVector<Producteur> sesProducteurs)
{
    this->lesProducteurs=sesProducteurs;
}
