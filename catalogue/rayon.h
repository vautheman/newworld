#ifndef RAYON_H
#define RAYON_H

#include <QString>
#include "producteur.h"

class Rayon : public Producteur
{
    // Propriétés des rayons
    // Libellé du rayon
    QString rayonLib;
    // Description du rayon
    QString rayonDesc;
    // Image du rayon
    QString rayonImg;

public:
    Rayon();
    // Constructeur qui récupère les rayons des producteurs
    Rayon(QString nomEnt, QString activite, QString adresse, QString pays, QString ville, QString cp, QString libelle, QString description, QString image);
};

#endif // RAYON_H
