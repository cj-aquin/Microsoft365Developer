#include <iostream>
#include <fstream>
#include <string>

using namespace std;



int main(){


/*1. Create a program that read the content of
a file saved in your computer using file
handling.*/


    fstream className;
    className.open("classnames.txt",ios::in);
    string classmates;
    int line = 0;
    while(getline(className, classmates))
    {
        line++;
        if(line >=2 &&  line<= 8){
        cout << classmates <<endl;}
    }
    className.close();

    return 0;
}
