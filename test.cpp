#include <iostream>
using namespace std;

const int DIM1 = 2;
const int DIM2 = 2; // Corrected dimensions for column sums
const int DIM3 = 3;

int main() {
    int myarray[DIM1][DIM2][DIM3];

    int count = 0;
    for (int i = 0; i < DIM1; i++) {
        for (int j = 0; j < DIM2; j++) {
            for (int k = 0; k < DIM3; k++) {
                count++;
                myarray[i][j][k] = count;
            }
        }
    }

    int total_sum = 0;
    int rowSum[DIM1][DIM2] = {0};
    int colSum[DIM2][DIM3] = {0};

    for (int i = 0; i < DIM1; i++) {
        for (int j = 0; j < DIM2; j++) {
            for (int k = 0; k < DIM3; k++) {
                cout << myarray[i][j][k] << ' ';
                total_sum += myarray[i][j][k];
                rowSum[i][j] += myarray[i][j][k];
                colSum[j][k] += myarray[i][j][k];
            }
            cout << endl;
        }
        cout << endl;
    }

    cout << "TOTAL: " << total_sum << endl;

    cout << "For SUM of ROWS" << endl;
    for (int i = 0; i < DIM1; i++) {
        for (int j = 0; j < DIM2; j++) {
            cout << rowSum[i][j] << ' ';
        }
        cout << endl;
    }
   cout << "For SUM of COLS" << endl;
for (int j = 0; j < DIM2; j++) {
    int colTotal = 0; // Initialize the column total
    for (int k = 0; k < DIM3; k++) {
        cout << colSum[j][k] << ' ';
        colTotal += colSum[j][k]; // Accumulate the column sum
    }
    cout << "(Column " << j + 1 << ") Total: " << colTotal << endl; // Display the column index and total
}


    return 0;
}
