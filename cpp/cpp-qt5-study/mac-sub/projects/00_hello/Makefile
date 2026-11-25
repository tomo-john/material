# Makefileを自分で書いてみる

CXX    = clang++
CXXFLAGS = -std=c++17 -Wall

build/hello: build/hello.o build/greet.o
	$(CXX) build/hello.o build/greet.o -o build/hello

build/hello.o: hello.cpp greet.h
	mkdir -p build
	$(CXX) $(CXXFLAGS) -c hello.cpp -o build/hello.o

build/greet.o: greet.cpp greet.h
	mkdir -p build
	$(CXX) $(CXXFLAGS) -c greet.cpp -o build/greet.o

.PHONY: clean

clean:
	rm -rf build/
