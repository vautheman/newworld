#ifndef POINTRELAI_H
#define POINTRELAI_H
#include <QString>

#include "client.h"

class PointRelai:public Client
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
    PointRelai(QString pointRelaiNom, QString pointRelaiAdresse);

    // Fonction qui retourne les points relais
    QString versChainePointRelai();
};

#endif // POINTRELAI_H
