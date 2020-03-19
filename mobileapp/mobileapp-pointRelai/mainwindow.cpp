#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QtSql>
#include <QUrl>


MainWindow::MainWindow(QNetworkAccessManager *pmyMWM, QString theName, QString theSurname, QString theIdentifiant, QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
}

MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::remplirQTableWidgetLivraison()
{
    ui->tableWidget_Livraison->setColumnCount(3);

    // On récupère les données de la base de données distante
    QUrl serviceUrl("http://127.0.0.1/newworld/mobileapp/assets/json/jsonLogin.php");
}

