
#include <iostream>
#include <fstream>

using namespace std;

int main(){
    ifstream my_names("Myfiles.txt");

    string sen;

    while(!my_names.eof()){

    getline(my_names, sen);

    cout << sen;
    }


    my_names.close();

    return 0;
}
