/********************************************************************************
** Form generated from reading UI file 'mainwindow.ui'
**
** Created by: Qt User Interface Compiler version 5.15.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_MAINWINDOW_H
#define UI_MAINWINDOW_H

#include <QtCore/QVariant>
#include <QtWidgets/QApplication>
#include <QtWidgets/QGridLayout>
#include <QtWidgets/QHBoxLayout>
#include <QtWidgets/QLCDNumber>
#include <QtWidgets/QLabel>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QVBoxLayout>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_MainWindow
{
public:
    QWidget *centralwidget;
    QHBoxLayout *horizontalLayout;
    QGridLayout *gridLayout;
    QVBoxLayout *verticalLayout_2;
    QPushButton *teaButton;
    QHBoxLayout *horizontalLayout_3;
    QLabel *drink2Label;
    QLCDNumber *teaStockDisplay;
    QVBoxLayout *verticalLayout;
    QPushButton *coffeeButton;
    QHBoxLayout *horizontalLayout_2;
    QLabel *drink1Label;
    QLCDNumber *coffeeStockDisplay;
    QVBoxLayout *verticalLayout_3;
    QPushButton *juiceButton;
    QHBoxLayout *horizontalLayout_4;
    QLabel *drink3Label;
    QLCDNumber *juiceStockDisplay;
    QVBoxLayout *verticalLayout_4;
    QPushButton *waterButton;
    QHBoxLayout *horizontalLayout_5;
    QLabel *drink4Label;
    QLCDNumber *waterStockDisplay;
    QVBoxLayout *verticalLayout_5;
    QHBoxLayout *horizontalLayout_6;
    QLabel *budgetLabel;
    QLCDNumber *budgetDisplay;
    QHBoxLayout *horizontalLayout_7;
    QLabel *totalLabel;
    QLCDNumber *totalDisplay;
    QPushButton *clearButton;
    QMenuBar *menubar;
    QStatusBar *statusbar;

    void setupUi(QMainWindow *MainWindow)
    {
        if (MainWindow->objectName().isEmpty())
            MainWindow->setObjectName(QString::fromUtf8("MainWindow"));
        MainWindow->resize(800, 600);
        centralwidget = new QWidget(MainWindow);
        centralwidget->setObjectName(QString::fromUtf8("centralwidget"));
        horizontalLayout = new QHBoxLayout(centralwidget);
        horizontalLayout->setObjectName(QString::fromUtf8("horizontalLayout"));
        gridLayout = new QGridLayout();
        gridLayout->setObjectName(QString::fromUtf8("gridLayout"));
        verticalLayout_2 = new QVBoxLayout();
        verticalLayout_2->setObjectName(QString::fromUtf8("verticalLayout_2"));
        teaButton = new QPushButton(centralwidget);
        teaButton->setObjectName(QString::fromUtf8("teaButton"));

        verticalLayout_2->addWidget(teaButton);

        horizontalLayout_3 = new QHBoxLayout();
        horizontalLayout_3->setObjectName(QString::fromUtf8("horizontalLayout_3"));
        drink2Label = new QLabel(centralwidget);
        drink2Label->setObjectName(QString::fromUtf8("drink2Label"));

        horizontalLayout_3->addWidget(drink2Label);

        teaStockDisplay = new QLCDNumber(centralwidget);
        teaStockDisplay->setObjectName(QString::fromUtf8("teaStockDisplay"));

        horizontalLayout_3->addWidget(teaStockDisplay);


        verticalLayout_2->addLayout(horizontalLayout_3);


        gridLayout->addLayout(verticalLayout_2, 0, 1, 1, 1);

        verticalLayout = new QVBoxLayout();
        verticalLayout->setObjectName(QString::fromUtf8("verticalLayout"));
        coffeeButton = new QPushButton(centralwidget);
        coffeeButton->setObjectName(QString::fromUtf8("coffeeButton"));

        verticalLayout->addWidget(coffeeButton);

        horizontalLayout_2 = new QHBoxLayout();
        horizontalLayout_2->setObjectName(QString::fromUtf8("horizontalLayout_2"));
        drink1Label = new QLabel(centralwidget);
        drink1Label->setObjectName(QString::fromUtf8("drink1Label"));

        horizontalLayout_2->addWidget(drink1Label);

        coffeeStockDisplay = new QLCDNumber(centralwidget);
        coffeeStockDisplay->setObjectName(QString::fromUtf8("coffeeStockDisplay"));

        horizontalLayout_2->addWidget(coffeeStockDisplay);


        verticalLayout->addLayout(horizontalLayout_2);


        gridLayout->addLayout(verticalLayout, 0, 0, 1, 1);

        verticalLayout_3 = new QVBoxLayout();
        verticalLayout_3->setObjectName(QString::fromUtf8("verticalLayout_3"));
        juiceButton = new QPushButton(centralwidget);
        juiceButton->setObjectName(QString::fromUtf8("juiceButton"));

        verticalLayout_3->addWidget(juiceButton);

        horizontalLayout_4 = new QHBoxLayout();
        horizontalLayout_4->setObjectName(QString::fromUtf8("horizontalLayout_4"));
        drink3Label = new QLabel(centralwidget);
        drink3Label->setObjectName(QString::fromUtf8("drink3Label"));

        horizontalLayout_4->addWidget(drink3Label);

        juiceStockDisplay = new QLCDNumber(centralwidget);
        juiceStockDisplay->setObjectName(QString::fromUtf8("juiceStockDisplay"));

        horizontalLayout_4->addWidget(juiceStockDisplay);


        verticalLayout_3->addLayout(horizontalLayout_4);


        gridLayout->addLayout(verticalLayout_3, 1, 0, 1, 1);

        verticalLayout_4 = new QVBoxLayout();
        verticalLayout_4->setObjectName(QString::fromUtf8("verticalLayout_4"));
        waterButton = new QPushButton(centralwidget);
        waterButton->setObjectName(QString::fromUtf8("waterButton"));

        verticalLayout_4->addWidget(waterButton);

        horizontalLayout_5 = new QHBoxLayout();
        horizontalLayout_5->setObjectName(QString::fromUtf8("horizontalLayout_5"));
        drink4Label = new QLabel(centralwidget);
        drink4Label->setObjectName(QString::fromUtf8("drink4Label"));

        horizontalLayout_5->addWidget(drink4Label);

        waterStockDisplay = new QLCDNumber(centralwidget);
        waterStockDisplay->setObjectName(QString::fromUtf8("waterStockDisplay"));

        horizontalLayout_5->addWidget(waterStockDisplay);


        verticalLayout_4->addLayout(horizontalLayout_5);


        gridLayout->addLayout(verticalLayout_4, 1, 1, 1, 1);


        horizontalLayout->addLayout(gridLayout);

        verticalLayout_5 = new QVBoxLayout();
        verticalLayout_5->setObjectName(QString::fromUtf8("verticalLayout_5"));
        horizontalLayout_6 = new QHBoxLayout();
        horizontalLayout_6->setObjectName(QString::fromUtf8("horizontalLayout_6"));
        budgetLabel = new QLabel(centralwidget);
        budgetLabel->setObjectName(QString::fromUtf8("budgetLabel"));

        horizontalLayout_6->addWidget(budgetLabel);

        budgetDisplay = new QLCDNumber(centralwidget);
        budgetDisplay->setObjectName(QString::fromUtf8("budgetDisplay"));

        horizontalLayout_6->addWidget(budgetDisplay);


        verticalLayout_5->addLayout(horizontalLayout_6);

        horizontalLayout_7 = new QHBoxLayout();
        horizontalLayout_7->setObjectName(QString::fromUtf8("horizontalLayout_7"));
        totalLabel = new QLabel(centralwidget);
        totalLabel->setObjectName(QString::fromUtf8("totalLabel"));

        horizontalLayout_7->addWidget(totalLabel);

        totalDisplay = new QLCDNumber(centralwidget);
        totalDisplay->setObjectName(QString::fromUtf8("totalDisplay"));

        horizontalLayout_7->addWidget(totalDisplay);


        verticalLayout_5->addLayout(horizontalLayout_7);

        clearButton = new QPushButton(centralwidget);
        clearButton->setObjectName(QString::fromUtf8("clearButton"));

        verticalLayout_5->addWidget(clearButton);


        horizontalLayout->addLayout(verticalLayout_5);

        MainWindow->setCentralWidget(centralwidget);
        menubar = new QMenuBar(MainWindow);
        menubar->setObjectName(QString::fromUtf8("menubar"));
        menubar->setGeometry(QRect(0, 0, 800, 25));
        MainWindow->setMenuBar(menubar);
        statusbar = new QStatusBar(MainWindow);
        statusbar->setObjectName(QString::fromUtf8("statusbar"));
        MainWindow->setStatusBar(statusbar);

        retranslateUi(MainWindow);

        QMetaObject::connectSlotsByName(MainWindow);
    } // setupUi

    void retranslateUi(QMainWindow *MainWindow)
    {
        MainWindow->setWindowTitle(QCoreApplication::translate("MainWindow", "MainWindow", nullptr));
        teaButton->setText(QCoreApplication::translate("MainWindow", "PushButton", nullptr));
        drink2Label->setText(QCoreApplication::translate("MainWindow", "Stock", nullptr));
        coffeeButton->setText(QCoreApplication::translate("MainWindow", "PushButton", nullptr));
        drink1Label->setText(QCoreApplication::translate("MainWindow", "Stock", nullptr));
        juiceButton->setText(QCoreApplication::translate("MainWindow", "PushButton", nullptr));
        drink3Label->setText(QCoreApplication::translate("MainWindow", "Stock", nullptr));
        waterButton->setText(QCoreApplication::translate("MainWindow", "PushButton", nullptr));
        drink4Label->setText(QCoreApplication::translate("MainWindow", "Stock", nullptr));
        budgetLabel->setText(QCoreApplication::translate("MainWindow", "Budget", nullptr));
        totalLabel->setText(QCoreApplication::translate("MainWindow", "Total", nullptr));
        clearButton->setText(QCoreApplication::translate("MainWindow", "clear", nullptr));
    } // retranslateUi

};

namespace Ui {
    class MainWindow: public Ui_MainWindow {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_MAINWINDOW_H
