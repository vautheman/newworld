#include "backoffice.h"
#include "ui_backoffice.h"

Backoffice::Backoffice(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::Backoffice)
{
    ui->setupUi(this);
}

Backoffice::~Backoffice()
{
    delete ui;
}
