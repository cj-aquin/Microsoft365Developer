#include <iostream>
#include <cstring> // Include this header for strlen
using namespace std;

int main() {
    char str[100] = "Hello, World!";
    cout << "String: " << str << endl;
    cout << "Length: " << strlen(str) << endl; // Length of the string without the null terminator
    return 0;
}
