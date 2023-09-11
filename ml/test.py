import pandas as pd
from sklearn.linear_model import LogisticRegression

# Step 2: Gather user input
user_input = {
    'WiFi': 1,
    'Parking': 1,
    'Catering': 0
}
# Step 4: Fetch venue data
venue_data = pd.read_csv('venue_data.csv')  # Assuming the venue data is stored in a CSV file

# Step 5: Prepare the data
X = venue_data[['WiFi', 'Parking', 'Catering']]
y = venue_data['Suitability']

# Step 6: Train a machine learning model
model = LogisticRegression()
model.fit(X, y)

# Step 7: Make predictions
user_input_df = pd.DataFrame(user_input, index=[0])
prediction = model.predict(user_input_df)

recommended_venues = venue_data[prediction == 1]['VenueName']
print("Recommended Venues:")
print(recommended_venues)
