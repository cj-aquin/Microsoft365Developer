#include <iostream>
#define NUMS 5

// TODO (CC_J#1#): Function that calculate the average and return the sum and divide ...
float Average(float grade[]){

    // Initialize a variable to store the sum of grades
    float sum  =0.0;

 // Iterate through the grades array and add the sum
    for(int i = 0; i < NUMS; i++){
        sum += grade[i];
    }
    return sum/NUMS;
}


int main(){
// TODO (CC_J#1#):  initialize an array that accepts and stores the five grades of a student
    float student_grade[NUMS];

// TODO (CC_J#1#): code that ask for input of  students grades
    std::cout << "Enter " << NUMS << " Student Grade:\n";



    for(int i = 0; i < NUMS; i++){
        std::cout << "Subject " << i+1 << ":";
        std::cin >> student_grade[i];
    }

// TODO (CC_J#1#): Print the result
    float average = Average(student_grade);
    std::cout << "\nThe Average is " <<average;

    return 0;
}
