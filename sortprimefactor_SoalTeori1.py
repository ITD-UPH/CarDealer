# Python program to sort array according to the 
# count of distinct prime factors 
import functools as ft 
import operator

# array to store the count of distinct prime 
prime = [0 for i in range(100001)] 

def SieveOfEratosthenes(): 

	# Create a array "prime[0..n]" and initialize 
	# all entries it as 0. A value in prime[i] 
	# will count of distinct prime factors. 

	# memset(prime, 0, sizeof(prime)) 

	# 0 and 1 does not have any prime factors 
	prime[0] = 0
	prime[1] = 0

	for p in range(2, 100002): 

		if p * p > 100001: 
			break

		# If prime[p] is not changed, 
		# then it is a prime 
		if (prime[p] == 0): 
			prime[p] += 1

			# Update all multiples of p greater than 
			# or equal to the square of it 
			# numbers which are multiple of p and are 
			# less than p^2 are already been marked. 
			for i in range(2 * p, 100001, p): 
				prime[i] += 1

# Function to sort the array on the 
# basis increasing count of distinct 
# prime factors 
def sortArr(arr, n): 

	# vector to store the number and 
	# count of prime factor 
	v = [] 

	for i in range(n): 

		# append the element and 
		# count of distinct 
		# prime factors 
		v.append([arr[i], prime[arr[i]]]) 

	# sort the array on the 
	# basis increasing count of 
	# distinct prime factors and element's values
	v.sort(key = operator.itemgetter(1,0)) 

	# display the sorted array 

	for i in range(n): 
		print(v[i][0]) 

	print() 

# Driver code 

# create the sieve 
SieveOfEratosthenes() 

arr = [3, 8, 45, 12, 78, 30, 79, 1] 

n = len(arr) 

sortArr(arr, n)
