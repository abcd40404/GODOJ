#include <bits/stdc++.h>
#include <sys/time.h>
#include <sys/wait.h>
#include <unistd.h>
#include <fcntl.h> // open, O_RDONLY, O_WRONLY

using namespace std;

int main(int argc, char* argv[]){
	string s;
	s = "code/testcase/";
	s += argv[1];
	// s += argv[1];
	// s += " < testcase/";
	// s += argv[2];
	// s += " > tmp.ou";

	pid_t p;
	p = fork();
	if(p < 0)
		cout << "fork fail" << endl;
	else if(p == 0){
		//不能用 system, 因為他會另外再開一個 process, 如果無限迴圈殺不掉
		// system(s.c_str());
		int fd1 = open(s.c_str(), O_RDONLY);
		int fd2 = open("code/tmp.ou", O_WRONLY);
		// stdin redirect to input file
		dup2(fd1, 0);
		// stdout redirect to output file
		dup2(fd2, 1);
		execl("code/tmp.out", "tmp.out", NULL);
		exit(0);
	}
	else{
		srand(time(NULL));
		struct timeval start, end;
		gettimeofday(&start, NULL);
		int status = 1;
		pid_t res;

		while(1){
			gettimeofday(&end, NULL);
			long long dif = 1000000 * (end.tv_sec - start.tv_sec) + end.tv_usec - start.tv_usec;
			double t = 1.0 * dif / 1000000;
			res = waitpid(p, &status, WNOHANG);
			// cout << status << endl;
			if(WIFEXITED(status)){
				WEXITSTATUS(status);
				printf("%.4lf", t);
				// printf("status: %d\n", status);
				break;
			}
			else if(WIFSIGNALED(status)){
				WTERMSIG(status);
				// printf("status: %d\n", status);
			}
			if(t > 1.0){
				kill(p, SIGKILL);
				printf("TLE");
				break;
			}
		}
		// if(res == p)
		// 	printf("success\n");
		// else
		// 	printf("NONONO %d\n", res);
	}
	return 0;
}
