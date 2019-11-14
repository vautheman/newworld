#include "pointrelai.h"

PointRelai::PointRelai()
{

}

PointRelai::PointRelai(QString nomDuClient, QString prenomDuClient, QString mailDuClient, QString pointRelaiNom, QString pointRelaiAdresse):
    Client(nomDuClient, prenomDuClient, mailDuClient)
{
    pRNom = pointRelaiNom;
    pRAdresse = pointRelaiAdresse;
}

QString PointRelai::versChainePointRelai()
{
    QString chaine;
    chaine += pRNom + ", ";
    chaine += pRAdresse;
    return chaine;
}
