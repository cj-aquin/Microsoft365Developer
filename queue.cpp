#include <iostream>
#include <queue>
using namespace std;

void display_queue(queue<string> *name);

int main(){
    queue<string> Name;
// get the size of queue


    Name.push("Johan");
    Name.push("Jamie");
    Name.push("Jennei");

    int sizeq = Name.size();
    cout << "Size of the Queue "<<sizeq << endl;

   // cout << "Queue " << Name.front();
//    cout << "Queue " << Name.back();
    cout<< "First queue" <<endl;
    display_queue(&Name);

//    Name.pop();

//    cout<< "Second queue" <<endl;
//    display_queue(&Name);


}

// this is passing by pointer
void display_queue(queue<string> *name){
 do {
        cout << name->front() << endl;
        name->pop();
    }while(!name->empty());
}

