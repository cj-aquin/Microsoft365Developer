#include <iostream>
#include <stack>

using namespace std;

int main(){
    stack <string> box;
    box.push("GAY");    box.push("are");
    box.push("You");


    int size_s = box.size();

    do{
        cout<< box.top() << ' ';
        box.pop();
    }while(!size_s == 0);


 return 0;
}
