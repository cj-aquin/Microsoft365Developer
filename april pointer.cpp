#include <iostream>
#include <cctype>

using namespace std;
const int CAP = 5;

void printBagItems(string *bag,int items);
string *add_item(string *bag , string &newItem, int &items);

int main()
{
    int items = 4;
    string default_bag[CAP] = {"Pencil", "Ballpen", "Notebook","Paper"}; //array va pointer
    string *bag = default_bag;


    printBagItems(bag, items); //passing pointer to function

    string **prev_bag = &bag; //pointer to pointer




    cout << "Do you want to add item in the bag? (y/n)" << endl;
    char answer;
    cin >> answer;

    if (tolower(answer) == 'y'){
    cout << "\nWhat item? ";
    string newItem;
    cin >> newItem;

    prev_bag = &bag;
    bag = add_item(bag, newItem, items); //functtion returniing pointer
    }
    printBagItems(bag, items);

    cout << endl << "Bag is too heavy unloading the things you added...." <<endl;
    if (items > 4){
        bag = *prev_bag;
        items--;
    }

    printBagItems(bag, items);


    return 0;
}


void printBagItems(string *bag,int items){
    cout << "\nThe current items in the bag are: " << endl;
    for (int i=0; i<items ;i++)
    {

        cout << i+1 <<". " << *(bag+i) << endl; //pointer arithmetic

    }
}

string *add_item(string *bag , string &newItem, int &items)
{
   if (items <CAP)
   {
       bag[items] = newItem;
       items++;
   }
   else{
    cout << "the bag is full";
   }
   return bag;
}

