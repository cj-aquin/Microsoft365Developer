#include <iostream>

using namespace std;


int main() {

    //This is for the length of the Array
    int len;
    cout << "Enter an the length of the array: ";
    cin >> len;

    //this is for entering each element of the array
    int maximum[len] = {};
    for (int i = 0; i < len; i++){
        cin >> maximum[i];
    }


    //check what is the highest value in array
    int temp = maximum[0]; // initialie a variable and set to the first element of the array
    for (int i = 1; i <len ; i++){ //iterate over the array using for loop
        if (maximum[i] > temp){  //compare each element of the array
            temp = maximum[i];}  //update the temp if the smaller is found
    }
    cout << "The maximum number is "<< temp; //print the highest number element




    return 0;
}

