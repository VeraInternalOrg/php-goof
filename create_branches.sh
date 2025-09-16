#!/bin/bash

# This script creates 80 git branches, named branch1, branch2, ..., branch80.
# Make sure you run this script in the root directory of your git repository.

echo "Starting branch creation..."

# Loop from 1 to 80
for i in {1..80}
do
   # Create a new branch with the name "branch" followed by the number
   git branch "branch$i"
   echo "Created branch: branch$i"
done

echo "Successfully created 80 branches."
echo "You can view them by running 'git branch --list'."

