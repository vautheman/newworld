#include "passerelle.h"
#include "client.h"
#include "pointrelai.h"
#include "pdf.h"

#include <QtSql>
#include <QDebug>
#include <QVector>

///
/// \brief Passerelle::Passerelle
/// Déclaration du constructeur vide de la classe Passerelle
Passerelle::Passerelle()
{

}

///
/// \brief Passerelle::chargerLesClients
/// \return resultat : retourne le vecteur de tout les clients récupérés via la base de données.
///
QVector<Client> Passerelle::chargerLesClients()
{
    //qDebug()<<"QVector<Client> Passerelle::chargerLesClients()";
    QVector<Client> resultat;
    // Conenxion base de données

        qDebug()<<"Ok - Ouverture de la base effectué";

        // Récupération des clients dans la base de données
        QSqlQuery reqClient;
        reqClient.exec("select * from clients natural join utilisateur where clients.userId = utilisateur.userId;");
        while(reqClient.next())
        {
            // On stocke les valeurs récupérés
            int cliId = reqClient.value("cliId").toInt();
            qDebug()<<cliId;
            QString cliNom = reqClient.value("userNom").toString();
            QString cliPrenom = reqClient.value("userPrenom").toString();
            QString cliEmail = reqClient.value("userEmail").toString();

            // On appelle le constructeur du client
            Client monClient(cliId, cliNom, cliPrenom, cliEmail);
            //QString chaineDuClient=monClient.versChaineClient();
            resultat.append(monClient);
            Passerelle maPasserelle;
            maPasserelle.chargerLesPointsRelaisDuClient(cliId);
        }
        return resultat;
}

///
/// \brief Passerelle::chargerLesPointsRelaisDuClient
/// \param noClient
/// \return resultat : Retourne le vecteur de tout les points relais récupérés via la base de données.
/// Les points relais récupérés correspondent à la sélection d'un client grâce à son identifiant rentré en paramètre.
QVector<PointRelai> Passerelle::chargerLesPointsRelaisDuClient(int noClient)
{
    qDebug()<<"QVector<PointRelai> Passerelle::chargerLesPointsRelaisDuClient(int noClient)";
    QVector<PointRelai> resultat;
    // Récupération des points relais que le client a ajouté
    QSqlQuery reqPointRelai;
    reqPointRelai.prepare("select * from selection natural join pointRelai where cliId = :cliId;");
    reqPointRelai.bindValue(":cliId", noClient);
    reqPointRelai.exec();
    while(reqPointRelai.next())
    {
        // On stocke les valeurs du point relai récupéré
        int pRId = reqPointRelai.value("relaiId").toInt();
        QString pRNom = reqPointRelai.value("relaiNom").toString();
        QString pRAdresse = reqPointRelai.value("relaiPays").toString() + ", " + reqPointRelai.value("relaiVille").toString() + ", " + reqPointRelai.value("relaiCP").toString() + ", " + reqPointRelai.value("relaiAdresse").toString();

        PointRelai monPointRelai(pRNom, pRAdresse);
        monPointRelai.setProducteurs(Passerelle::chargerLesProducteursDuPointRelai(pRId));
        resultat.append(monPointRelai);
        //QString chaineDuPointRelai = monPointRelai.versChainePointRelai();
        //qDebug()<<chaineDuPointRelai;
    }
    return resultat;
}

///
/// \brief Passerelle::chargerLesProducteursDuPointRelai
/// \param noPointRelai
/// \return resultat : Retourne le vecteur de tout les producteurs récupérés via la base de données.
/// Les producteurs récupérés correspondent aux produits disponible dans les points relais rentrés en paramètre.
///
QVector<Producteur> Passerelle::chargerLesProducteursDuPointRelai(int noPointRelai)
{
    //qDebug()<<"QVector<Producteur> Passerelle::chargerLesProducteursDuPointRelai(int noPointRelai)";
    QVector<Producteur> resultat;

    // Récupération des producteurs dans la base de données
    QSqlQuery reqProducteur;
    reqProducteur.prepare("select * from choix natural join producteurs where relaiId = :relaiId");
    reqProducteur.bindValue(":relaiId", noPointRelai);
    reqProducteur.exec();

    // Boucle qui stocke un à un les producteurs
    while(reqProducteur.next())
    {
        // On stocke les valeurs du producteur récupéré
        int producteurId = reqProducteur.value("prodId").toInt();
        QString producteurNomSociete = reqProducteur.value("prodNomEnt").toString();
        QString producteurAdresse = reqProducteur.value("prodPays").toString() + ", " + reqProducteur.value("prodCP").toString() + ", " + reqProducteur.value("prodVille").toString() + ", " + reqProducteur.value("prodAdresse").toString();

        // On appelle le constructeur
        Producteur monProducteur(producteurNomSociete, producteurAdresse);

        // On ajoute les données dans le vecteur Producteur
        resultat.append(monProducteur);

        // On appelle la fonction qui récupère les produits
        Passerelle maPasserelle;
        maPasserelle.chargerLesProduits(noPointRelai, producteurId);
    }

    return resultat;
}

///
/// \brief Passerelle::chargerLesProduits
/// \param noPointRelai
/// \param noProducteur
/// \return resultat : Retourne le vecteur de tout les produits récupérés via la base de données
/// Les prorduits récupérés correspondent aux produits disponible dans les points relai
QVector<Produit> Passerelle::chargerLesProduits(int noPointRelai, int noProducteur)
{
    qDebug()<<"Produit :";
    //qDebug()<<"QVector<Produit> Passerelle::chargerLesProduits(int noPointRelai, int noProducteur)";
    QVector<Produit> resultat;

    // Récupération des produits dans la base de données
    QSqlQuery reqProduits;
    reqProduits.prepare("select prodId, prodNomEnt, produitId, produitLib, produitDesc, produitImg, produitPU, produitQuantite from produits natural join choix natural join producteurs where relaiId = :relaiId and prodId = :prodId");
    reqProduits.bindValue(":relaiId", noPointRelai);
    reqProduits.bindValue(":prodId", noProducteur);
    reqProduits.exec();

    // Boucle qui stocke un à un les produits
    while(reqProduits.next())
    {
        // On stocke les valeurs du produit récupéré
        int produitId = reqProduits.value("produitId").toInt();
        QString produitLib = reqProduits.value("produitLib").toString();
        QString produitDesc = reqProduits.value("produitDesc").toString();
        QString produitImg = reqProduits.value("produitImg").toString();
        double produitPU = reqProduits.value("produitPU").toDouble();
        int produitQuantite = reqProduits.value("produitQuantite").toInt();

        // On appelle le constructeur des produits
        Produit monProduit(produitLib, produitDesc, produitImg, produitPU, produitQuantite);

        // On ajoute les données dans le vecteur Produit
        resultat.append(monProduit);
    }
    return resultat;
}


