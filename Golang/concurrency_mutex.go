package main

import (
	"sync"
	"time"
)

var m = map[string]int{"a": 1}
var lock = sync.RWMutex{}

func main() {
	go Read()
	time.Sleep(1 * time.Second)
	go Write()
	time.Sleep(1 * time.Minute)
}

func Read() {
	lock.RLock()
	defer lock.RUnlock()
	_ = m["a"]
}

func Write() {
	lock.Lock()
	defer lock.Unlock()
	m["b"] = 2
}
