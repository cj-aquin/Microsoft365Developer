#include <iostream>
using namespace std;

struct Node{
    int data;
    Node* prev;
    Node* next;
};


void printlist(Node* head){
    if (head == nullptr) return;

    Node* temp = head;
    do {
        cout << temp->data << " ";
        temp = temp->next;
    }while(temp != head);
    cout << endl;
}


void printlistreverse(Node* tail){
    if (tail == nullptr) return;

    Node* temp = tail;
    do {
        cout << temp->data << " ";
        temp = temp->prev;
    }while(temp != tail);
    cout << endl;
}

void insertAtEnd(Node*& tail, int newdata){
    Node* newNode = new Node();
    newNode->prev=tail;
    newNode->data= newdata;
    newNode->next=NULL;

    if (tail != nullptr){
        newNode->next= tail->next;
        tail->next->prev= newNode;
        tail->next = newNode;
    }
    else{
        newNode->next = newNode;
        newNode->prev = newNode;
    }
    tail = newNode;

}

int main(){
    Node* head = new Node;
    Node* first = new Node;
    Node* second = new Node;
    Node* tail = second;

    head->prev=NULL;
    head->data= 1;
    head->next= first;

    first->prev=head;
    first->data=2;
    first->next=second;

    second->prev= first;
    second->data=3;
    second->next=head; //for circular
    head->prev=second; // for circular

    printlist(head);
    printlistreverse(tail);

    insertAtEnd(tail, 4);
    printlist(head);
    printlistreverse(tail);

 return 0;
}
