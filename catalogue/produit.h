#ifndef PRODUIT_H
#define PRODUIT_H

#include <QString>

class Produit
{
    // Propriétés des produits
    // Libellé du produit
    QString produitLib;
    // Description du produit
    QString produitDesc;
    // Image du produit
    QString produitImage;
    // Prix unitaire du produit
    double produitPU;
    // Quantite de produit restant
    int produitQuantite;


public:
    Produit();
    // Constructeur qui récupère les produits des producteurs
    Produit(QString libelle, QString description, QString image, double prixUnitaire, int quantite);
};

#endif // PRODUIT_H
