#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int main(){
    /*2. Create a program that writes a content tol
a text file using file handling.*/

    fstream classNames;
    classNames.open("classnames1.txt",ios::out);
    string names;
    int num = 0;
     cout<<"Enter names of Classmates: " << endl;
    do{

            getline(cin, names);
            if (names != ""){
            classNames << names <<endl;}
            num++;

    }while(num < 6 && names != "");
    classNames.close();


    return 0;
}
