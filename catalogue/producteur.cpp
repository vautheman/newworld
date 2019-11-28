#include "producteur.h"
#include <QDebug>

Producteur::Producteur()
{

}

Producteur::Producteur(QString sonNomDeSociete, QString sonAdresse)
{
    this->producteurNomSociete = sonNomDeSociete;
    this->producteurAdresse = sonAdresse;

    qDebug()<<" " + producteurNomSociete + ", " + producteurAdresse;
}

QString Producteur::versChaineProducteurs()
{
    QString chaine;

    chaine += "<p>" + producteurNomSociete + "</p>";
    chaine += "<p>" + producteurAdresse + "</p>";

    PointRelai lePointRelai;
    for(int noProd=0;noProd<lePointRelai.lesProducteurs.size();noProd++)
    {
        chaine+="<li>"+lePointRelai.lesProducteurs[noProd].versChaineProducteurs()+"</li>";
    }
    return chaine;
}
