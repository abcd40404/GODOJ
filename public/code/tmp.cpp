#include <bits/stdc++.h>

using namespace std;

#define st first
#define nd second

long long fib[50];

int main(){
	int n;
	scanf("%d", &n);
	fib[1] = 1;
	fib[2] = 1;
	for(int i = 3; i < 50 ; i++){
		fib[i] = fib[i - 1] + fib[i - 2];
	}
	for(int i = 0; i < n; i++){
		int x;
		scanf("%d", &x);
		printf("%lld\n", fib[x]);
	}
	return 0;
}