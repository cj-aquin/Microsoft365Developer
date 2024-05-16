#include <iostream>
#include <string>
#include <fstream>

using namespace std;

int main(){

    ifstream fileA("classnames1.txt",ios::in);

    ofstream fileB("classnames3.txt",ios::out);


    string names;
    while(getline(fileA, names)){
        fileB << names << endl;
    }

    fileA.close();
    fileB.close();

    cout << "Class names has been copy to \"classmate3.txt\""<< endl;

    return 0;





}
