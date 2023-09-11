from flask import Flask, render_template, request
import numpy as np

app = Flask(__name__)

# Sample venue-user matrix
venue_user_matrix = np.array([
    [5, 3, 0, 4, 0, 0, 0],
    [4, 0, 4, 0, 5, 0, 0],
    [1, 1, 0, 2, 0, 0, 0],
    [0, 0, 4, 0, 0, 1, 1],
    [0, 0, 5, 0, 0, 0, 0],
    [0, 0, 0, 0, 4, 0, 4],
])

# Calculate similarity between venues using cosine similarity
def calculate_similarity(venue_user_matrix):
    similarities = np.zeros((venue_user_matrix.shape[0], venue_user_matrix.shape[0]))
    for i in range(venue_user_matrix.shape[0]):
        for j in range(venue_user_matrix.shape[0]):
            if i == j:
                similarities[i, j] = 1.0
            else:
                similarities[i, j] = np.dot(venue_user_matrix[i], venue_user_matrix[j]) / \
                                     (np.linalg.norm(venue_user_matrix[i]) * np.linalg.norm(venue_user_matrix[j]))
    return similarities

# Get venue recommendations for a given user based on selected venues
def get_recommendations(user_preferences, venue_user_matrix, similarities, k=3):
    # Find similar users based on selected venues
    similar_users = np.argsort(similarities[user_preferences])[:-k-1:-1]
    
    # Get unrated venues recommended by similar users
    recommendations = []
    for user in similar_users:
        unrated_venues = np.where(venue_user_matrix[user] == 0)[0]
        recommended_venues = unrated_venues[np.argsort(venue_user_matrix[user][unrated_venues])][::-1][:k]
        recommendations.extend(recommended_venues)
    
    return recommendations

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/recommend', methods=['POST','GET'])
def recommend():
    # Get attributes from HTML form
    attributes = [int(request.form['attribute1']),
                  int(request.form['attribute2']),
                  int(request.form['attribute3']),
                  int(request.form['attribute4']),
                  int(request.form['attribute5'])]
    
    # Perform venue recommendation
    user_preferences = np.where(np.array(attributes) == 1)[0]
    similarities = calculate_similarity(venue_user_matrix)
    recommendations = get_recommendations(user_preferences, venue_user_matrix, similarities, k=3)
    
    # Render the recommendation results
    return render_template('recommend.html', recommendations=recommendations)

if __name__ == '__main__':
    app.run(debug=True)
