#pragma once
#ifndef POINTRELAI_H
#define POINTRELAI_H
#include <QString>

#include "client.h"
#include "producteur.h"
#include <QVector>
class Producteur;
class PointRelai
{
private:
    // Propriété du point relai
    // Nom
    QString pRNom;
    // Adresse
    QString pRAdresse;
    QVector<Producteur>lesProducteurs;
public:
    PointRelai();
    // Constructeur du point relai
    PointRelai(QString pointRelaiNom, QString pointRelaiAdresse);

    // Fonction qui retourne les points relais
    QString versChainePointRelai();
    void setProducteurs(QVector<Producteur> sesProducteurs);
};

#endif // POINTRELAI_H
