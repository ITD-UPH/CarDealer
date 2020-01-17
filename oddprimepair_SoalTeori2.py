# Python program to find a prime number 
# pair whose sum is equal to given number 

# Generate all prime numbers less than n. 
def SieveOfEratosthenes(n, isPrime): 

	# Initialize all entries of boolean 
	# array as True. A value in isPrime[i] 
	# will finally be False if i is Not a 
	# prime, else True bool isPrime[n+1] 
	isPrime[0] = isPrime[1] = False
	for i in range(2, n+1): 
		isPrime[i] = True

	p = 2
	while(p*p <= n): 
	
		# If isPrime[p] is not changed, 
		# then it is a prime 
		if (isPrime[p] == True): 
		
			# Update all multiples of p 
			i = p*p 
			while(i <= n): 
				isPrime[i] = False
				i += p 
		p += 1
		
# Prints a prime pair with given sum 
def findPrimePair(n): 

	# Generating primes using Sieve 
	isPrime = [0] * (n+1) 
	SieveOfEratosthenes(n, isPrime) 

	# Traversing all numbers to find 
	# first pair 
	for i in range(0, n): 
	
		if (isPrime[i] and isPrime[n - i]): 
		
			print(i,(n - i)) 
			return
			
# Driven program 
n = 20
findPrimePair(n)
