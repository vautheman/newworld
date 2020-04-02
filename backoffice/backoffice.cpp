#include "backoffice.h"
#include "ui_backoffice.h"
#include <QSql>
#include <QSqlQuery>
#include <QDebug>

Backoffice::Backoffice(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::Backoffice)
{
    ui->setupUi(this);
    Backoffice::remplirComboBoxRayons();
    // Header tableWidget_produits
    ui->tableWidget_produits->setHorizontalHeaderItem(0, new QTableWidgetItem("Libellé"));
    ui->tableWidget_produits->setHorizontalHeaderItem(1, new QTableWidgetItem("Description"));
    ui->tableWidget_produits->setHorizontalHeaderItem(2, new QTableWidgetItem("Prix unitaire"));
    ui->tableWidget_produits->setHorizontalHeaderItem(3, new QTableWidgetItem("Stock"));
}

Backoffice::~Backoffice()
{
    delete ui;
}

void Backoffice::remplirComboBoxRayons()
{
    // On va chercher les différents rayons dans la base de données
    QSqlQuery req_rayons("SELECT rayonLib FROM rayons");

    // On fais une boucle qui ajoute un à un les rayons dans un tableau
    while(req_rayons.next())
    {
        list_rayons += req_rayons.value("rayonLib").toString();
    }
    qDebug()<<list_rayons;
    // Puis on ajoute les rayons présents dans le tableau dans le comboBox_rayons
    ui->comboBox_rayons->addItems(list_rayons);
}

// On récupère l'index du rayon sélectionné dans le comboBox_rayons
void Backoffice::on_comboBox_rayons_currentIndexChanged(int index)
{
    qDebug()<<index;
    qDebug()<<list_rayons[index];
    list_produits.clear();
    current_index_rayon = index;

    remplirQTableWidgetProduits(index);
}

void Backoffice::remplirQTableWidgetProduits(int index_rayon)
{
    // On effectu une requète qui récupère les produits en fonction du rayon sélectionné
    QSqlQuery req_produits;
    req_produits.prepare("select produitLib, produitId, typeProduitId, rayonId from produits natural join typeProduit natural join rayons where rayonLib = :rayonLib");
    req_produits.bindValue(":rayonLib", list_rayons[index_rayon]);
    req_produits.exec();

    // On effectu une boucle qui stocke dans une vraiable les produits correspondant au rayon sélectionné
    while(req_produits.next())
    {
        list_produits += req_produits.value("produitLib").toString();
    }
    qDebug()<<list_produits;

    // Maintenant que l'on as la liste des produits il nous faut aller chercher les informations des produits dans la base de données
    QStringList info_produit;

    ui->tableWidget_produits->setColumnCount(4);
    ui->tableWidget_produits->setRowCount(list_produits.count());
    qDebug()<<list_produits.count();

    for(int nbProduit = 0; nbProduit < list_produits.count(); nbProduit++)
    {
        QSqlQuery req_info_produits;
        req_info_produits.prepare("select produitId, produitLib, produitDesc, produitImg, produitPU, produitQuantite, produitValid from produits where produitLib = :produitLib");
        req_info_produits.bindValue(":produitLib", list_produits[nbProduit]);
        req_info_produits.exec();

        while(req_info_produits.next())
        {
            // Maintenant que l'on as la liste des produits il nous restes qu'à insérer la liste des produits dans le tableWidget
            ui->tableWidget_produits->setItem(nbProduit, 0, new QTableWidgetItem(req_info_produits.value("produitLib").toString()));
            ui->tableWidget_produits->setItem(nbProduit, 1, new QTableWidgetItem(req_info_produits.value("produitDesc").toString()));
            ui->tableWidget_produits->setItem(nbProduit, 2, new QTableWidgetItem(req_info_produits.value("produitPU").toString()));
            ui->tableWidget_produits->setItem(nbProduit, 3, new QTableWidgetItem(req_info_produits.value("produitQuantite").toString()));

            // On change la couleur de la ligne si le produit est validé ou non (rouge = valid; vert = invalid)
            for(int nbColumn = 0; nbColumn < ui->tableWidget_produits->columnCount(); nbColumn++)
            {
                if(req_info_produits.value("produitValid") == 1)
                {
                    ui->tableWidget_produits->item(nbProduit, nbColumn)->setBackground(Qt::green); // valid
                } else ui->tableWidget_produits->item(nbProduit, nbColumn)->setBackground(Qt::red); // invalid
            }
        }
    }
}

void Backoffice::on_tableWidget_produits_cellClicked(int row, int column)
{
    // On récupère le nom du produit de la ligne sélectionnée
    QString produitLib_clicked = ui->tableWidget_produits->item(row, 0)->text();
    qDebug()<<produitLib_clicked;

    // On récupère les infos du produit correspondante dans la base de données
    QSqlQuery req_info_produit;
    req_info_produit.prepare("select produitImg, produitLib, produitDesc, produitPU, produitQuantite from produits where produitLib = :produitLib");
    req_info_produit.bindValue(":produitLib", produitLib_clicked);
    req_info_produit.exec();
    req_info_produit.next();

    // On rempli les différents paramètres avec les informations récupérées
    ui->label_produit_image->setPixmap(QPixmap("/home/autheman/public_html/newworld/assets/images/produits/" + req_info_produit.value("produitImg").toString()));
    ui->lineEdit_produit_nom->setText(req_info_produit.value("produitLib").toString());
    ui->textEdit_produit_description->setText(req_info_produit.value("produitDesc").toString());
    ui->label_produit_pu->setText("PU : " + req_info_produit.value("produitPU").toString());
    ui->label_produit_stock->setText("Stock : " + req_info_produit.value("produitQuantite").toString());
}

void Backoffice::on_pushButton_accepted_produit_clicked()
{
    // On récupère le nom du produit sélectionné
    int row_current_produit = ui->tableWidget_produits->currentIndex().row();
    QString current_produitLib = ui->tableWidget_produits->item(row_current_produit, 0)->text();
    qDebug()<<current_produitLib;

    // Si on clique sur valider on change la valeur du produit sur 1 dans la base de données
    QSqlQuery req_validation;
    req_validation.prepare("UPDATE produits SET produitValid = 1 where produitLib = :produitLib");
    req_validation.bindValue(":produitLib", current_produitLib);
    req_validation.exec();

    // current index comboBox pour recharger le QTableWidget que l'on vide au préalable
    list_produits.clear();
    remplirQTableWidgetProduits(current_index_rayon);
}

void Backoffice::on_pushButton_denied_produit_clicked()
{
    // On récupère le nom du produit sélectionné
    int row_current_produit = ui->tableWidget_produits->currentIndex().row();
    QString current_produitLib = ui->tableWidget_produits->item(row_current_produit, 0)->text();
    qDebug()<<current_produitLib;

    // Si on clique sur denied on change la valeur du produit sur 0 dans la base de données
    QSqlQuery req_validation;
    req_validation.prepare("UPDATE produits SET produitValid = 0 where produitLib = :produitLib");
    req_validation.bindValue(":produitLib", current_produitLib);
    req_validation.exec();

    // current index comboBox pour recharger le QTableWidget que l'on vide au préalable
    list_produits.clear();
    remplirQTableWidgetProduits(current_index_rayon);
}
