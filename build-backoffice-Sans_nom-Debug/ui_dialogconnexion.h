/********************************************************************************
** Form generated from reading UI file 'dialogconnexion.ui'
**
** Created by: Qt User Interface Compiler version 5.11.3
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_DIALOGCONNEXION_H
#define UI_DIALOGCONNEXION_H

#include <QtCore/QVariant>
#include <QtWidgets/QApplication>
#include <QtWidgets/QDialog>
#include <QtWidgets/QGridLayout>
#include <QtWidgets/QHBoxLayout>
#include <QtWidgets/QLabel>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QSpacerItem>
#include <QtWidgets/QVBoxLayout>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_DialogConnexion
{
public:
    QWidget *widget;
    QGridLayout *gridLayout_3;
    QWidget *widget_2;
    QGridLayout *gridLayout_4;
    QLabel *label_2;
    QPushButton *pushButton;
    QSpacerItem *verticalSpacer_2;
    QSpacerItem *horizontalSpacer_2;
    QSpacerItem *verticalSpacer;
    QLabel *label_3;
    QSpacerItem *horizontalSpacer;
    QVBoxLayout *verticalLayout;
    QSpacerItem *verticalSpacer_3;
    QLabel *label_4;
    QLabel *labelLogin;
    QLineEdit *lineEditLogin;
    QLabel *labelPassword;
    QLineEdit *lineEditPassword;
    QHBoxLayout *horizontalLayout;
    QPushButton *pushButtonConnection;
    QPushButton *pushButton_2;
    QSpacerItem *verticalSpacer_4;
    QLabel *label_5;

    void setupUi(QDialog *DialogConnexion)
    {
        if (DialogConnexion->objectName().isEmpty())
            DialogConnexion->setObjectName(QStringLiteral("DialogConnexion"));
        DialogConnexion->resize(835, 567);
        widget = new QWidget(DialogConnexion);
        widget->setObjectName(QStringLiteral("widget"));
        widget->setGeometry(QRect(-10, -10, 859, 588));
        gridLayout_3 = new QGridLayout(widget);
        gridLayout_3->setObjectName(QStringLiteral("gridLayout_3"));
        widget_2 = new QWidget(widget);
        widget_2->setObjectName(QStringLiteral("widget_2"));
        widget_2->setStyleSheet(QLatin1String("background-color: rgb(52, 58, 64);\n"
"color: rgb(255, 255, 255);"));
        gridLayout_4 = new QGridLayout(widget_2);
        gridLayout_4->setObjectName(QStringLiteral("gridLayout_4"));
        label_2 = new QLabel(widget_2);
        label_2->setObjectName(QStringLiteral("label_2"));
        label_2->setMinimumSize(QSize(0, 50));
        label_2->setMaximumSize(QSize(16777215, 500));

        gridLayout_4->addWidget(label_2, 1, 1, 1, 1);

        pushButton = new QPushButton(widget_2);
        pushButton->setObjectName(QStringLiteral("pushButton"));
        pushButton->setMaximumSize(QSize(170, 16777215));
        pushButton->setAutoDefault(false);

        gridLayout_4->addWidget(pushButton, 3, 1, 1, 1);

        verticalSpacer_2 = new QSpacerItem(20, 40, QSizePolicy::Minimum, QSizePolicy::Expanding);

        gridLayout_4->addItem(verticalSpacer_2, 4, 1, 1, 1);

        horizontalSpacer_2 = new QSpacerItem(40, 20, QSizePolicy::Expanding, QSizePolicy::Minimum);

        gridLayout_4->addItem(horizontalSpacer_2, 1, 2, 1, 1);

        verticalSpacer = new QSpacerItem(20, 40, QSizePolicy::Minimum, QSizePolicy::Expanding);

        gridLayout_4->addItem(verticalSpacer, 0, 1, 1, 1);

        label_3 = new QLabel(widget_2);
        label_3->setObjectName(QStringLiteral("label_3"));
        label_3->setMinimumSize(QSize(0, 100));

        gridLayout_4->addWidget(label_3, 2, 1, 1, 1);

        horizontalSpacer = new QSpacerItem(40, 20, QSizePolicy::Expanding, QSizePolicy::Minimum);

        gridLayout_4->addItem(horizontalSpacer, 1, 0, 1, 1);


        gridLayout_3->addWidget(widget_2, 0, 0, 1, 1);

        verticalLayout = new QVBoxLayout();
        verticalLayout->setObjectName(QStringLiteral("verticalLayout"));
        verticalLayout->setContentsMargins(50, -1, 50, -1);
        verticalSpacer_3 = new QSpacerItem(20, 40, QSizePolicy::Minimum, QSizePolicy::Expanding);

        verticalLayout->addItem(verticalSpacer_3);

        label_4 = new QLabel(widget);
        label_4->setObjectName(QStringLiteral("label_4"));

        verticalLayout->addWidget(label_4);

        labelLogin = new QLabel(widget);
        labelLogin->setObjectName(QStringLiteral("labelLogin"));
        labelLogin->setMaximumSize(QSize(16777215, 30));

        verticalLayout->addWidget(labelLogin);

        lineEditLogin = new QLineEdit(widget);
        lineEditLogin->setObjectName(QStringLiteral("lineEditLogin"));
        lineEditLogin->setMinimumSize(QSize(0, 40));
        lineEditLogin->setMaximumSize(QSize(16777215, 40));
        lineEditLogin->setStyleSheet(QStringLiteral("background-color: rgb(234, 238, 241);"));

        verticalLayout->addWidget(lineEditLogin);

        labelPassword = new QLabel(widget);
        labelPassword->setObjectName(QStringLiteral("labelPassword"));
        labelPassword->setMaximumSize(QSize(16777215, 30));

        verticalLayout->addWidget(labelPassword);

        lineEditPassword = new QLineEdit(widget);
        lineEditPassword->setObjectName(QStringLiteral("lineEditPassword"));
        lineEditPassword->setMinimumSize(QSize(0, 40));
        lineEditPassword->setMaximumSize(QSize(16777215, 40));
        lineEditPassword->setStyleSheet(QStringLiteral("background-color: rgb(234, 238, 241);"));
        lineEditPassword->setEchoMode(QLineEdit::Password);

        verticalLayout->addWidget(lineEditPassword);

        horizontalLayout = new QHBoxLayout();
        horizontalLayout->setSpacing(6);
        horizontalLayout->setObjectName(QStringLiteral("horizontalLayout"));
        horizontalLayout->setContentsMargins(-1, 20, -1, -1);
        pushButtonConnection = new QPushButton(widget);
        pushButtonConnection->setObjectName(QStringLiteral("pushButtonConnection"));
        pushButtonConnection->setStyleSheet(QLatin1String("background-color: rgb(52, 58, 64);\n"
"color: rgb(255, 255, 255);"));

        horizontalLayout->addWidget(pushButtonConnection);

        pushButton_2 = new QPushButton(widget);
        pushButton_2->setObjectName(QStringLiteral("pushButton_2"));
        pushButton_2->setAutoDefault(true);

        horizontalLayout->addWidget(pushButton_2);


        verticalLayout->addLayout(horizontalLayout);

        verticalSpacer_4 = new QSpacerItem(20, 40, QSizePolicy::Minimum, QSizePolicy::Expanding);

        verticalLayout->addItem(verticalSpacer_4);

        label_5 = new QLabel(widget);
        label_5->setObjectName(QStringLiteral("label_5"));
        label_5->setMinimumSize(QSize(0, 20));

        verticalLayout->addWidget(label_5);


        gridLayout_3->addLayout(verticalLayout, 0, 1, 1, 1);


        retranslateUi(DialogConnexion);

        QMetaObject::connectSlotsByName(DialogConnexion);
    } // setupUi

    void retranslateUi(QDialog *DialogConnexion)
    {
        DialogConnexion->setWindowTitle(QApplication::translate("DialogConnexion", "Dialog", nullptr));
        label_2->setText(QApplication::translate("DialogConnexion", "<html><head/><body><p><span style=\" font-size:14pt;\">Backoffice Newworld</span></p></body></html>", nullptr));
        pushButton->setText(QApplication::translate("DialogConnexion", "Contact Administrator", nullptr));
        label_3->setText(QApplication::translate("DialogConnexion", "<html><head/><body><p>Welcome to the backoffice<br> application. This is where you will<br>be able to moderate and administer<br>the newworld website</p></body></html>", nullptr));
        label_4->setText(QApplication::translate("DialogConnexion", "<html><head/><body><p align=\"center\"><span style=\" font-size:16pt;\">LOGIN FORM</span></p></body></html>", nullptr));
        labelLogin->setText(QApplication::translate("DialogConnexion", "<html><head/><body><p><span style=\" font-size:9pt;\">E-MAIL</span></p></body></html>", nullptr));
        labelPassword->setText(QApplication::translate("DialogConnexion", "<html><head/><body><p><span style=\" font-size:9pt;\">PASSWORD</span></p></body></html>", nullptr));
        pushButtonConnection->setText(QApplication::translate("DialogConnexion", "LOGIN", nullptr));
        pushButton_2->setText(QApplication::translate("DialogConnexion", "CANCEL", nullptr));
        label_5->setText(QApplication::translate("DialogConnexion", "<html><head/><body><p align=\"right\"><span style=\" font-size:7pt;\">Designed by AUTHEMAN Victor</span></p></body></html>", nullptr));
    } // retranslateUi

};

namespace Ui {
    class DialogConnexion: public Ui_DialogConnexion {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_DIALOGCONNEXION_H
