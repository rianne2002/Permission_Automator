import pandas as pd
from sklearn.linear_model import LogisticRegression

# Step 1: Gather user input
user_input = {
    'WiFi': 1,
    'Parking': 1,
    'Catering': 0
}

# Step 2: Fetch venue data
venue_data = pd.read_csv('venue_data.csv')  # Assuming the venue data is stored in a CSV file

# Step 3: Prepare the data
X = venue_data[['WiFi', 'Parking', 'Catering']]
y = venue_data['Suitability']

# Step 4: Train a machine learning model
model = LogisticRegression()
model.fit(X, y)

# Step 5: Make predictions
user_input_df = pd.DataFrame(user_input, index=[0])
user_input_df = user_input_df.reindex(columns=X.columns, fill_value=0)  # Fill missing columns with 0
prediction = model.predict(user_input_df)

# Step 6: Retrieve recommended venues
recommended_venues = venue_data[prediction == 1]['VenueName']

print("Recommended Venues:")
print(recommended_venues)
