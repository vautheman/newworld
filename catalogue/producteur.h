#pragma once
#ifndef PRODUCTEUR_H
#define PRODUCTEUR_H

#include <QString>
#include "pointrelai.h"
#include "produit.h"

///
/// \brief The Producteur class
/// La classe producteur permet de stocker les informations de ce dernier dans des paramètres
class Producteur
{
private:
    // L'identifiant du producteur
    int producteurId;
    // Le nom de la société du producteur
    QString producteurNomSociete;
    // L'adresse du producteur
    QString producteurAdresse;
    // Vecteur de produit
    QVector<Produit> lesProduits;

public:
    // Déclaration du constructeur vide
    Producteur();
    // Déclaration du constructeur des producteurs
    Producteur(QString sonNomDeSociete, QString sonAdresse);

    // Fonction qui permet l'affichage des producteurs
    QString versChaineProducteurs();

    void setProduits(QVector<Produit> sesProduits);
};

#endif // PRODUCTEUR_H
