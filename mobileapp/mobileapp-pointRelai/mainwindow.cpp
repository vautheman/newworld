#include "mainwindow.h"
#include "ui_mainwindow.h"

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
