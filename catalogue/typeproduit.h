#ifndef TYPEPRODUIT_H
#define TYPEPRODUIT_H

#include <QString>
#include "rayon.h"

class TypeProduit : public Rayon
{
    // Les propriétés des types de produits
    // Libellé du type de produit
    QString TypeProduitLib;

public:
    TypeProduit();
    // Constructeur qui récupère les types de produits des producteurs
    TypeProduit(QString libelleProduit, QString nomEnt, QString activite, QString adresse, QString pays, QString ville, QString cp, QString libelle, QString description, QString image);
};

#endif // TYPEPRODUIT_H
