#ifndef POINTRELAI_H
#define POINTRELAI_H
#include <QString>

#include "client.h"
#include "producteur.h"

class PointRelai:public Client, Producteur
{
private:
    // Propriété du point relai
    // Nom
    QString pRNom;
    // Adresse
    QString pRAdresse;
public:
    PointRelai();
    // Constructeur du point relai
    //PointRelai(QString nomDuClient, QString prenomDuClient, QString mailDuClient, QString pointRelaiNom, QString pointRelaiAdresse);
    PointRelai(QString pointRelaiNom, QString pointRelaiAdresse);

    // Fonction qui retourne les points relais
    QString versChainePointRelai();
};

#endif // POINTRELAI_H