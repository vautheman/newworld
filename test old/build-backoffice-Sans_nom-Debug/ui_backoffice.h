/********************************************************************************
** Form generated from reading UI file 'backoffice.ui'
**
** Created by: Qt User Interface Compiler version 5.11.3
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_BACKOFFICE_H
#define UI_BACKOFFICE_H

#include <QtCore/QVariant>
#include <QtWidgets/QApplication>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_Backoffice
{
public:
    QMenuBar *menuBar;
    QToolBar *mainToolBar;
    QWidget *centralWidget;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *Backoffice)
    {
        if (Backoffice->objectName().isEmpty())
            Backoffice->setObjectName(QStringLiteral("Backoffice"));
        Backoffice->resize(400, 300);
        menuBar = new QMenuBar(Backoffice);
        menuBar->setObjectName(QStringLiteral("menuBar"));
        Backoffice->setMenuBar(menuBar);
        mainToolBar = new QToolBar(Backoffice);
        mainToolBar->setObjectName(QStringLiteral("mainToolBar"));
        Backoffice->addToolBar(mainToolBar);
        centralWidget = new QWidget(Backoffice);
        centralWidget->setObjectName(QStringLiteral("centralWidget"));
        Backoffice->setCentralWidget(centralWidget);
        statusBar = new QStatusBar(Backoffice);
        statusBar->setObjectName(QStringLiteral("statusBar"));
        Backoffice->setStatusBar(statusBar);

        retranslateUi(Backoffice);

        QMetaObject::connectSlotsByName(Backoffice);
    } // setupUi

    void retranslateUi(QMainWindow *Backoffice)
    {
        Backoffice->setWindowTitle(QApplication::translate("Backoffice", "Backoffice", nullptr));
    } // retranslateUi

};

namespace Ui {
    class Backoffice: public Ui_Backoffice {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_BACKOFFICE_H
