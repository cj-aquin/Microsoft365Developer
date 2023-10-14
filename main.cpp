#include <iostream>

using namespace std;

int main()
{
    //Display a Welcome message
    cout << "Welcome to Three Milktea shop \n\n";

    cout << "========================================================\n";

    //Display a list of milk tea flavor to choose from and store it in  a variable
    cout << "These are the list of MilkTea flavors that are available. \nPlease pick: \n";
    /*int choco = 40;
    int vanilla = 50;
    int Caramel= 60;
    int okinawa = 70;

    int Choco = 40;
    int Vanilla = 50;
    int caramel = 60;

    int Okinawa = 70;*/

    cout << "Choco                  -  40 php\n";
    cout << "Vanilla                -  40 php\n";
    cout << "Caramel                -  40 php\n";
    cout << "Okinawa                -  40 php\n";

    cout << "\nFlavor: ";
    string flavor;
    getline(cin, flavor);

    cout << "\n========================================================\n";

    //Display the level of sugar and store it in  a variable
    cout << "\nAmount of sugar level: \n";
    cout << "5% \n";
    cout << "10% \n";
    cout << "30% \n";
    cout << "50% \n";
    cout << "80% \n";
    cout << "70% \n";

    cout << "\nSugar level: ";
    string sugarlevel;
    getline(cin, sugarlevel);

    cout << "\n========================================================\n";

    //ask the customer what name should you put
    cout << "\nWhat name should i put sir/maam: ";
    string name;
    getline(cin,name);

    cout << "\n========================================================\n";

    //Display the details of order
    cout << "\nThese are your order: \n";
    cout << "Flavor: " << flavor << "\n";
    cout << "Sugarlevel: " << sugarlevel << "%\n";
    cout << "Name: " << name << "\n";

    cout << "\n========================================================\n";

    //Display the total amount of order and store it in a variable
    int priceofmilktea = 40;
    cout << "\nTotal amount: \n";
    cout << priceofmilktea << " php";

    cout << "\n\n========================================================";
    //ask the customer for the payment and store it in a variable
    int payment;
    cout << "\n\nYour payment: ";
    cin >> payment;

    cout << "\n========================================================\n";

    //Calculate the changed and display it
    cout << "\nYour change: " << payment - priceofmilktea;

    cout << "\n\n========================================================\n";

    //Display a  thank you message
    cout << "\n\nHere is your milktea " << flavor << " flavor sir/maam.\nThank you for your patronage.\n\n";


    return 0;
}
