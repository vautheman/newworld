#ifndef PASSERELLE_H
#define PASSERELLE_H

#include <QVector>
#include "client.h"
#include "pointrelai.h"
#include "producteur.h"
#include "produit.h"


class Passerelle
{
public:
    Passerelle();
    //void chargerLesClients();
    //static void chargerLesPointsRelais();
    ///
    /// \brief chargerLesClients
    /// \return Vecteur de client
    /// Le vecteur chargerLesClients permet de rechercher les clients dans la base de données ainsi que de les stocker dans ce dernier.
    /// Un constructeur de la classe Client va aussi permettre d'ajouter un client ainsi que toutes les informations le concernant.
    static QVector<Client> chargerLesClients();

    ///
    /// \brief chargerLesPointsRelaisDuClient
    /// \param noClient
    /// \return Vecteur de point relai
    /// Le vecteur chargerLesPointsRelaisDuClient permet de rechercher les points relais dans la base de données en fonction de l'identifiant du client rentré en paramètre.
    /// Un constructeur de la classe PointRelai va aussi permettre d'ajouter un point relai ainsi que toutes les données le concernant.
    ///
    static QVector<PointRelai> chargerLesPointsRelaisDuClient(int noClient);

    ///
    /// \brief chargerLesProducteurDuPointRelai
    /// \param noPointRelai
    /// \return Vecteur de producteur
    /// Le vecteur chargerLesProducteursDuPointRelai permet de rechercher les producteurs dans la base de données en fonction de l'identifiant du point relai rentré en paramètre.
    /// Un constructeur de la classe Producteur va aussi permettre d'ajouter un producteur ainsi que toutes les informations le concernant.
    static QVector<Producteur> chargerLesProducteursDuPointRelai(int noPointRelai);

    ///
    /// \brief chargerLesProduits
    /// \param noPointRelai
    /// \param noProducteur
    /// \return Vecteur de produit
    /// Le vecteur chargerLesProduits permet de rechercher les produits dans la base de données en fonction de l'identifiant du point relai et du producteur rentrés en paramètre.
    /// Un constructeur de la classe Produit va aussi permettre d'ajouter un produit ainsi que toutes les informations le concernant.
    QVector<Produit> chargerLesProduits(int noPointRelai, int noProducteur);


};

#endif // PASSERELLE_H
