import numpy as np
from sklearn.metrics.pairwise import cosine_similarity

# Venue features matrix
venue_features = np.array([
    [1, 0, 1, 0, 1],  # Venue 1
    [0, 1, 1, 1, 0],  # Venue 2
    [1, 1, 0, 1, 0],  # Venue 3
    [0, 1, 0, 1, 1]   # Venue 4
])

# User input for venue features
user_input = np.array([1, 1, 0, 1, 0])

# Calculate similarity scores between user input and venue features
similarity_scores = cosine_similarity(user_input.reshape(1, -1), venue_features)[0]

# Get the top recommended venues based on similarity scores
num_recommendations = 2
top_indices = np.argsort(similarity_scores)[::-1][:num_recommendations]

# Print the recommended venues
print("Top", num_recommendations, "Venue Recommendations:")
for index in top_indices:
    print("Venue", index+1)