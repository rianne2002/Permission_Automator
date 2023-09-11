import csv
import sys
import json
from sklearn import tree

# Read the attribute-venue values from the CSV file
dataset = []
with open('attribute_venue.csv', 'r') as file:
    reader = csv.DictReader(file)
    for row in reader:
        dataset.append(row)

# Preprocess the dataset and extract features
features = []
labels = []
for data in dataset:
    features.append([data['attribute1'], data['attribute2'], data['attribute3'], data['attribute4'], data['attribute5']])  # Adjust based on the actual attributes
    labels.append(data['venue'])

# Load the input data from the command line argument
input_data_json = sys.argv[1]
input_data = json.loads(input_data_json)

# Get the selected attributes from the input data
selected_attribute1 = input_data['attribute1']
selected_attribute2 = input_data['attribute2']
selected_attribute3 = input_data['attribute3']
selected_attribute4 = input_data['attribute4']
selected_attribute5 = input_data['attribute5']


# Create and train the decision tree model
model = tree.DecisionTreeClassifier()
model.fit(features, labels)

# Make a prediction for the selected attributes
predicted_venue = model.predict([[selected_attribute1, selected_attribute2, selected_attribute3, selected_attribute4, selected_attribute5]])

# Print the predicted venue
print("Recommended Venue:", predicted_venue[0])
