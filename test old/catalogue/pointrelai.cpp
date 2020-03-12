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
    chaine += "<h4>You have chosen the relay points :</h4>";
    chaine += "<p style='margin-left: 20px;'>" + pRNom + " : " + pRAdresse + "</p>";
    chaine+="<h4>Liste des producteurs</h4>";
    for(int noProd=0;noProd<lesProducteurs.size();noProd++)
    {
        chaine+=lesProducteurs[noProd].versChaineProducteurs();
    }
    //j'obtiens les rayons
    //pour chaque rayon
    //j'affiche les produits du rayon
    return chaine;
}

void PointRelai::setProducteurs(QVector<Producteur> sesProducteurs)
{
    this->lesProducteurs=sesProducteurs;
}
