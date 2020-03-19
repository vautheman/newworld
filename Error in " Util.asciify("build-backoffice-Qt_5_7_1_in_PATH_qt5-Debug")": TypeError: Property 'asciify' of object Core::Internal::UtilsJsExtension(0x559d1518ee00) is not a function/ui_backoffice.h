/********************************************************************************
** Form generated from reading UI file 'backoffice.ui'
**
** Created by: Qt User Interface Compiler version 5.7.1
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_BACKOFFICE_H
#define UI_BACKOFFICE_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QComboBox>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QLabel>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QTableWidget>
#include <QtWidgets/QTextEdit>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QToolButton>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_Backoffice
{
public:
    QWidget *centralWidget;
    QTableWidget *tableWidget_produits;
    QComboBox *comboBox_rayons;
    QLabel *label_produit_image;
    QToolButton *toolButton;
    QPushButton *pushButton_accepted_produit;
    QPushButton *pushButton_denied_produit;
    QLineEdit *lineEdit_produit_nom;
    QTextEdit *textEdit_produit_description;
    QLabel *label_productName;
    QLabel *label_productDesc;
    QLabel *label_produit_pu;
    QLabel *label_produit_stock;
    QMenuBar *menuBar;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *Backoffice)
    {
        if (Backoffice->objectName().isEmpty())
            Backoffice->setObjectName(QStringLiteral("Backoffice"));
        Backoffice->resize(899, 668);
        centralWidget = new QWidget(Backoffice);
        centralWidget->setObjectName(QStringLiteral("centralWidget"));
        tableWidget_produits = new QTableWidget(centralWidget);
        tableWidget_produits->setObjectName(QStringLiteral("tableWidget_produits"));
        tableWidget_produits->setGeometry(QRect(40, 70, 451, 501));
        tableWidget_produits->setEditTriggers(QAbstractItemView::NoEditTriggers);
        tableWidget_produits->setDragDropMode(QAbstractItemView::NoDragDrop);
        tableWidget_produits->setSelectionMode(QAbstractItemView::SingleSelection);
        tableWidget_produits->setSelectionBehavior(QAbstractItemView::SelectRows);
        comboBox_rayons = new QComboBox(centralWidget);
        comboBox_rayons->setObjectName(QStringLiteral("comboBox_rayons"));
        comboBox_rayons->setGeometry(QRect(40, 20, 421, 28));
        label_produit_image = new QLabel(centralWidget);
        label_produit_image->setObjectName(QStringLiteral("label_produit_image"));
        label_produit_image->setGeometry(QRect(510, 340, 201, 181));
        label_produit_image->setScaledContents(true);
        toolButton = new QToolButton(centralWidget);
        toolButton->setObjectName(QStringLiteral("toolButton"));
        toolButton->setGeometry(QRect(470, 20, 28, 27));
        pushButton_accepted_produit = new QPushButton(centralWidget);
        pushButton_accepted_produit->setObjectName(QStringLiteral("pushButton_accepted_produit"));
        pushButton_accepted_produit->setGeometry(QRect(510, 540, 91, 28));
        pushButton_denied_produit = new QPushButton(centralWidget);
        pushButton_denied_produit->setObjectName(QStringLiteral("pushButton_denied_produit"));
        pushButton_denied_produit->setGeometry(QRect(620, 540, 91, 28));
        lineEdit_produit_nom = new QLineEdit(centralWidget);
        lineEdit_produit_nom->setObjectName(QStringLiteral("lineEdit_produit_nom"));
        lineEdit_produit_nom->setGeometry(QRect(510, 100, 231, 28));
        textEdit_produit_description = new QTextEdit(centralWidget);
        textEdit_produit_description->setObjectName(QStringLiteral("textEdit_produit_description"));
        textEdit_produit_description->setGeometry(QRect(510, 170, 231, 91));
        label_productName = new QLabel(centralWidget);
        label_productName->setObjectName(QStringLiteral("label_productName"));
        label_productName->setGeometry(QRect(510, 70, 121, 20));
        label_productDesc = new QLabel(centralWidget);
        label_productDesc->setObjectName(QStringLiteral("label_productDesc"));
        label_productDesc->setGeometry(QRect(510, 140, 141, 20));
        label_produit_pu = new QLabel(centralWidget);
        label_produit_pu->setObjectName(QStringLiteral("label_produit_pu"));
        label_produit_pu->setGeometry(QRect(510, 280, 81, 20));
        label_produit_stock = new QLabel(centralWidget);
        label_produit_stock->setObjectName(QStringLiteral("label_produit_stock"));
        label_produit_stock->setGeometry(QRect(610, 280, 81, 20));
        Backoffice->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(Backoffice);
        menuBar->setObjectName(QStringLiteral("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 899, 25));
        Backoffice->setMenuBar(menuBar);
        mainToolBar = new QToolBar(Backoffice);
        mainToolBar->setObjectName(QStringLiteral("mainToolBar"));
        Backoffice->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(Backoffice);
        statusBar->setObjectName(QStringLiteral("statusBar"));
        Backoffice->setStatusBar(statusBar);

        retranslateUi(Backoffice);

        QMetaObject::connectSlotsByName(Backoffice);
    } // setupUi

    void retranslateUi(QMainWindow *Backoffice)
    {
        Backoffice->setWindowTitle(QApplication::translate("Backoffice", "Backoffice", Q_NULLPTR));
        label_produit_image->setText(QApplication::translate("Backoffice", "Produit_image", Q_NULLPTR));
        toolButton->setText(QApplication::translate("Backoffice", "...", Q_NULLPTR));
        pushButton_accepted_produit->setText(QApplication::translate("Backoffice", "Accepted", Q_NULLPTR));
        pushButton_denied_produit->setText(QApplication::translate("Backoffice", "Denied", Q_NULLPTR));
        label_productName->setText(QApplication::translate("Backoffice", "Product name :", Q_NULLPTR));
        label_productDesc->setText(QApplication::translate("Backoffice", "Product description :", Q_NULLPTR));
        label_produit_pu->setText(QApplication::translate("Backoffice", "PU : ", Q_NULLPTR));
        label_produit_stock->setText(QApplication::translate("Backoffice", "Stock : ", Q_NULLPTR));
    } // retranslateUi

};

namespace Ui {
    class Backoffice: public Ui_Backoffice {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_BACKOFFICE_H
