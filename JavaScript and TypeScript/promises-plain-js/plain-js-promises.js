// Function simulating an asynchronous operation (e.g., API call)
function fetchData() {
    return new Promise((resolve, reject) => {
        // Simulate a delay (e.g., API call)
        setTimeout(() => {
            const success = Math.random() > 0.5; // Simulate success or failure

            if (success) {
                const data = { message: 'Data successfully fetched!' };
                resolve(data);
            } else {
                reject(new Error('Failed to fetch data.'));
            }
        }, 2000); // Simulate a 2-second delay
    });
}

// Using the Promise
fetchData()
    .then((data) => {
        console.log('Success:', data.message);
        // You can return another Promise here if needed
        return anotherAsyncOperation();
    })
    .then((result) => {
        console.log('Another operation completed with result:', result);
    })
    .catch((error) => {
        console.error('Error:', error.message);
    })
    .finally(() => {
        console.log('Finally block executed, regardless of success or failure.');
    });

// Another asynchronous operation
function anotherAsyncOperation() {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve('Another operation completed successfully!');
        }, 1000); // Simulate a 1-second delay
    });
}




