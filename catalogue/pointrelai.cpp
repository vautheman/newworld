#include "pointrelai.h"
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
    chaine += pRNom + ", ";
    chaine += pRAdresse;
    return chaine;
}
