#include <iostream>
using namespace std;

struct Node {
    int data;
    Node* next;
    Node* prev;
};

void printlist(Node* head) {
    if (head == nullptr) return; // Handle empty list

    Node* temp = head;
    do {
        cout << temp->data << ' ';
        temp = temp->next;
    } while (temp != head);
    cout << endl;
}

void printprev(Node* tail) {
    if (tail == nullptr) return; // Handle empty list

    Node* temp = tail;
    do {
        cout << temp->data << ' ';
        temp = temp->prev;
    } while (temp != tail);
    cout << endl;
}

void insertAtEnd(Node*& head, Node*& tail, int newdata) {
    Node* newNode = new Node();
    newNode->data = newdata;

    if (tail != nullptr) { // List is not empty
        newNode->prev = tail;
        newNode->next = head;
        tail->next = newNode;
        head->prev = newNode;
    } else { // List is empty
        head = newNode;
        newNode->next = newNode;
        newNode->prev = newNode;
    }

    tail = newNode; // Update tail to new node
}

void insertAtBeginning(Node*& tail, Node*& head, int newdata) {
    Node* newNode = new Node();
    newNode->data = newdata;

    if (head != nullptr) { // List is not empty
        newNode->prev = tail;
        newNode->next = head;
        tail->next = newNode;
        head->prev = newNode;
    } else { // List is empty
        head = newNode;
        tail = newNode;
        newNode->next = newNode;
        newNode->prev = newNode;
    }

    head = newNode; // Update head to new node
}

int main() {
    // Create the initial list
    Node* head = nullptr;
    Node* tail = nullptr;

    head = new Node;
    Node* second = new Node;
    Node* third = new Node;

    head->prev = third;
    head->data = 10;
    head->next = second;

    second->prev = head;
    second->data = 11;
    second->next = third;

    third->prev = second;
    third->data = 12;
    third->next = head;

    tail = third; // Set tail to point to the last node (third)

    printlist(head);

    insertAtEnd(head, tail, 13);
    cout << "After inserting at end: " << endl;
    printlist(head);

    insertAtBeginning(tail, head, 14);
    cout << "After inserting at beginning: " << endl;
    printlist(head);

    cout << "Printing in reverse order: " << endl;
    printprev(tail);

    return 0;
}
