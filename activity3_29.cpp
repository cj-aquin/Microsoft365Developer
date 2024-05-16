#include <iostream>

using namespace std;


int main() {

    //This is for the length of the Array
    int len;
    cout << "Enter an the length of the array: ";
    cin >> len;

    //this is for entering each element of the array
    int minimum[len] = {};
    for (int i = 0; i < len; i++){
        cin >> minimum[i];
    }


    //check what is the lowest value in array
    int temp = minimum[0]; // initialie a variable and set to the first element of the array
    int elementnum = 0; // for counting which element is the lowest
    for (int i = 1; i <len ; i++){ //iterate over the array using for loop
        if (minimum[i] < temp){  //compare each element of the array
            temp = minimum[i]; //update the temp if the smaller is found
            elementnum = i; //set the elementnum to i to count what element is the lowest
        }
    }
    cout << "The minimum number is "<<temp << " which is array minimum[" << elementnum<< "]\n" << "at position " << elementnum ; //print the lowest element number and which element it is




    return 0;
}

