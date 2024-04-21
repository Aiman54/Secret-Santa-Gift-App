import streamlit as st
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

# Load your dataset into a pandas DataFrame
df = pd.read_csv("Kaggle.csv", encoding="latin1")

def preprocess_text(text, lowercase=True, preserve_url_case=True):
    if pd.isnull(text):  # Handle NaN values
        return ''
    processed_text = text.lower() if lowercase and not preserve_url_case else text
    return processed_text

# Apply preprocessing to the relevant columns
columns_to_preprocess = ['product_title', 'query', 'product_description']
image_url_column = 'product_image'
for column in columns_to_preprocess:
    preserve_case = column == image_url_column
    df[column] = df[column].apply(lambda x: preprocess_text(x, preserve_url_case=preserve_case))

# Combine the relevant columns into a single text column
df['combined_text'] = df['product_title'] + ' ' + df['query'] + ' ' + df['product_description']

# Create the TF-IDF vectorizer
vectorizer = TfidfVectorizer()
tfidf_matrix = vectorizer.fit_transform(df['combined_text'])

# Streamlit app
st.markdown('<style>h1{color:red;}</style>', unsafe_allow_html=True)

st.title('Find a Suitable Gift based on Your Friend Wishlist')

st.write("Hi there! :wave: I can help you find similar ones based on your description. :point_up:")
st.write("Please enter Your Friend Wishlist below, and I will recommend relevant ones :smile:")
st.write("The dataset contains products from all around of global website :star2:. However, please note that the specific product you are looking for might not be available :disappointed:")

# User input
with st.form("query_form"):
    user_input = st.text_input("Enter Your Friend Wishlist")
    num_recommendations = st.slider("Number of Recommendations", min_value=1, max_value=30, value=10)
    submit_button = st.form_submit_button("Search")

if submit_button and user_input:
    # Process user input
    preprocessed_input = preprocess_text(user_input)
    user_tfidf = vectorizer.transform([preprocessed_input])

    # Calculate cosine similarity
    cosine_similarities = cosine_similarity(user_tfidf, tfidf_matrix).flatten()

    # Retrieve top N similar documents
    top_n = 5  # Number of top recommendations to retrieve
    top_indices = cosine_similarities.argsort()[-num_recommendations:][::-1]  # Indices of top N similar documents

    # Display the results
    st.subheader("Recommendations:")
    for index in top_indices:
        st.markdown(f"<h3>{df['product_title'][index]}</h3>", unsafe_allow_html=True)
        st.markdown(f"<h4 style='font-size: 20px;'>Price: {df['product_price'][index]}</h4>", unsafe_allow_html=True)
        st.image(df['product_image'][index])
        st.write("URL:", df['url'][index])
        st.write("---")



