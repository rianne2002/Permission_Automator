import numpy as np
import lightfm
from scipy.sparse import csr_matrix
from lightfm import LightFM
from lightfm.evaluation import precision_at_k

# Sample venue features matrix
venue_features = np.array([
    [1, 0, 1, 0, 1],
    [0, 1, 1, 1, 0],
    [1, 1, 0, 1, 0],
    [0, 1, 0, 1, 1]
])

# Sample user ratings matrix
user_ratings = np.array([
    [5, 0, 4, 0, 3],
    [0, 4, 5, 5, 0],
    [4, 5, 0, 3, 0],
    [0, 5, 0, 3, 4]
])

# Convert the venue features and user ratings matrices to sparse format
venue_features_sparse = csr_matrix(venue_features)
user_ratings_sparse = csr_matrix(user_ratings)

# Create the WRMF model
model = LightFM(loss='warp')
model.fit(user_ratings_sparse, item_features=venue_features_sparse, epochs=10)

# Get the recommendations for a user
user_index = 0
num_recommendations = 2
recommendations = model.recommend(user_index, user_ratings_sparse, item_features=venue_features_sparse, num_threads=2, num_items=num_recommendations)

# Print the recommended venues
print("Top", num_recommendations, "Venue Recommendations for User", user_index+1)
for venue_index in recommendations:
    print("Venue", venue_index+1)